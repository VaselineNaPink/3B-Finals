<php?
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Route::apiResource('students', StudentController::class);
Route::get('students/{id}/subjects', [SubjectController::class, 'index']);
Route::post('students/{id}/subjects', [SubjectController::class, 'store']);
Route::get('students/{id}/subjects/{subject_id}', [SubjectController::class, 'show']);
Route::patch('students/{id}/subjects/{subject_id}', [SubjectController::class, 'update']);
