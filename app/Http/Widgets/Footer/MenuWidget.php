<?php namespace App\Http\Widgets\Footer;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Orchid\CMS\Core\Models\Menu;
use Orchid\Widget\Service\Widget;

class MenuWidget extends Widget
{
    /**
     * @var
     */
    public $menu;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->menu = Cache::remember('footer-menu-' . App::getLocale(), Carbon::now()->addHour(), function () {
            return Menu::where('lang', App::getLocale())
                ->whereNull('parent')
                ->where('type', 'footer')
                ->with('children')
                ->get();
        });

    }

    /**
     * @return mixed
     */
    public function run()
    {
        return view('partials.footer.menu', [
            'menu' => $this->menu,
        ]);
    }

}
