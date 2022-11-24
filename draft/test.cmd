php artisan make:controller Api/SubjectController --api --model=Subject
php artisan make:controller Api/GuardianController --api --model=Guardian
php artisan make:controller Api/BrancheController --api --model=Branche
php artisan make:controller Api/GroupController --api --model=Group
php artisan make:controller Api/TeacherController --api --model=Teacher
php artisan make:controller Api/RoomController --api --model=Room
php artisan make:controller Api/BuildingController --api --model=Building
php artisan make:controller Api/ExamController --api --model=Exam
php artisan make:controller Api/BatchController --api --model=Batch
php artisan make:controller Api/StudentController --api --model=Student

Route::apiResource('student', StudentController::class);

Route::apiResource('', SubjectController::class);
Route::apiResource('', GuardianController::class);
Route::apiResource('', BrancheController::class);
Route::apiResource('', GroupController::class); 
Route::apiResource('', TeacherController::class);
Route::apiResource('', RoomController::class);
Route::apiResource('', BuildingController::class);
Route::apiResource('', ExamController::class);
Route::apiResource('', BatchController ::class);
Route::apiResource('', StudentController::class);