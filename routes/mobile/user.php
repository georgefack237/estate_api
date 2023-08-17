use App\Http\Controllers\UserController;


Route::post('mobile/users/register', [UserController::class, 'register']);
