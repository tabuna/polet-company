<?php

namespace App\Http\Controllers\Tender;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Orchid\CMS\Core\Models\Attachment;
use App\Http\Controllers\Controller;

class FileUploadController extends Controller
{
    /**
     * @var int
     */
    public $time;

    /**
     * @var false|string
     */
    public $date;

    /**
     * AttachmentController constructor.
     */
    public function __construct()
    {
        $this->time = time();
        $this->date = date('Y/m/d');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
       $file = $this->saveFile($request->file('file'));

        return response()->json($file);
    }


    /**
     * @param UploadedFile $file
     *
     * @return UploadedFile|static
     */
    protected function saveFile(UploadedFile $file)
    {
        Storage::disk('public')->makeDirectory($this->date);

        $hashName = sha1($this->time . $file->getClientOriginalName());
        $name = $hashName . '.' . $file->getClientOriginalExtension();

        $fullPath = storage_path('app/public/' . DIRECTORY_SEPARATOR . $this->date . DIRECTORY_SEPARATOR);

        $file->move($fullPath, $name);

        try {
            $mimeType = $file->getMimeType();
        } catch (\Exception $exception) {
            $mimeType = 'unknown';
        }

        return Attachment::create([
            'name'          => $hashName,
            'original_name' => $file->getClientOriginalName(),
            'mime'          => $mimeType,
            'extension'     => $file->getClientOriginalExtension(),
            'size'          => $file->getClientSize(),
            'path'          => $this->date . DIRECTORY_SEPARATOR,
            'user_id'       => Auth::user()->id,
        ]);
    }

    /**
     * @param Request $request
     */
    public function sort(Request $request)
    {
        $files = $request->get('files', []);
        foreach ($files as $id => $sort) {
            $attachment = Attachment::find($id);
            $attachment->sort = $sort;
            $attachment->save();
        }
    }

    /**
     * Delete files.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function destroy($id)
    {
        Attachment::find($id)->delete();

        return response(200);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFilesPost($id)
    {
        $files = Attachment::where('post_id', $id)->orderBy('sort', 'asc')->get();

        return response()->json($files);
    }

    /**
     * @param         $id
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update($id, Request $request)
    {
        $files = Attachment::findOrFail($id);
        $files->fill($request->get('attachment', []));
        $files->save();

        return response(200);
    }
}
