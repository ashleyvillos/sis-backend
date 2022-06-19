<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\DisciplinaryMeasureController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ClassListController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\BasicEducationController;
use App\Http\Controllers\HigherEducationController;
use App\Http\Controllers\MadarisController;
use App\Http\Controllers\TechvocController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BillingItemController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\GradingPeriodController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    
    Route::middleware('auth:api')->group(function () {
        Route::resource('rooms', RoomController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('buildings', BuildingController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('terms', TermController::class);
        Route::resource('disciplinary_measures', DisciplinaryMeasureController::class);
        Route::resource('libraries', LibraryController::class);
        Route::resource('class_lists', ClassListController::class);
        Route::resource('students', StudentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('grades', GradeController::class);
        Route::resource('student_classes', StudentClassController::class);
        Route::resource('basic_education', BasicEducationController::class);
        Route::resource('higher_education', HigherEducationController::class);
        Route::resource('madaris', MadarisController::class);
        Route::resource('techvoc', TechvocController::class);
        Route::resource('attendances', AttendanceController::class);
        Route::resource('enrollment', EnrollmentController::class);
        Route::resource('personnels', PersonnelController::class);
        Route::resource('activities', ActivityController::class);
        Route::resource('billing_items', BillingItemController::class);
        Route::resource('billings', BillingController::class);
        Route::resource('grading_periods', GradingPeriodController::class);
    });
});

