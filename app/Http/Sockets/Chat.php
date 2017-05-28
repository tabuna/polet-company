<?php

namespace App\Http\Sockets;

use App\Core\Models\User;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Orchid\Socket\BaseSocketListener;
use Ratchet\ConnectionInterface;

class Chat extends BaseSocketListener
{
    /**
     * @var
     */
    protected $clientsId;
    /**
     * @var array
     */
    protected $userList = [];
    /**
     * @var array
     */
    protected $adminList = [];

    /**
     * @var \SplObjectStorage
     */
    protected $clients;

    /**
     * @var
     */
    protected $cache;

    /**
     * Chat constructor.
     */
    public function __construct()
    {
        $this->cache = Cache::driver();
        $this->clients = new \SplObjectStorage();
    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
    }

    /**
     * @param ConnectionInterface $from
     * @param string              $msg
     */
    public function onMessage(ConnectionInterface $from, $msg)
    {
        $userId = $this->getUserFromSession($from);

        if (!is_null($userId)) {
            $user = $this->cache->remember('users-chat-' . $userId, 3600, function () use ($userId) {
                return User::find($userId);
            });

            /*
             * Добавляем информацию о пользователе
             */
            $msg = json_decode($msg, true);
            $msg = array_merge($msg, $user->toArray());
            $msg = json_encode($msg);

            foreach ($this->clients as $client) {
                $client->send($msg);
            }
        }
    }

    public function getUserFromSession($conn)
    {
        $session = (new SessionManager(App::getInstance()))->driver();
        $cookies = $conn->WebSocket->request->getCookies();
        $laravelCookie = urldecode($cookies[Config::get('session.cookie')]);
        $idSession = Crypt::decrypt($laravelCookie);

        $session->setId($idSession);

        $conn->session = $session;
        $conn->session->start();

        $userId = $conn->session->get(Auth::getName());

        return $userId;
    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        //Берем user id
        $userId = $this->getUserFromSession($conn);
        //Ищем юзера у которого дисконект
        $needleElem = array_search($userId, $this->userList);
        //Удаляем из массива юзера у которого дисконект
        unset($this->userList[$needleElem]);
    }

    /**
     * @param ConnectionInterface $conn
     * @param \Exception          $e
     */
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
    }
}
