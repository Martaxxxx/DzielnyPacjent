use Illuminate\Auth\Events\Login;
use App\Listeners\LoginListener;

protected $listen = [
    Login::class => [
        LoginListener::class,
    ],
];
