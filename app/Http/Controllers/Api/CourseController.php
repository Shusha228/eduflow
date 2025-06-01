<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\DTO\CourseDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\CourseResource;
use App\Services\CourseService;
use Illuminate\Http\JsonResponse;
use function auth;

class CourseController extends Controller{

    public function __construct(private CourseService $courseService){
    }

    public function index() : JsonResponse{
        $courses = $this->courseService->getPaginatedCourses();
        return CourseResource::collection($courses)->response();
    }

    public function store(CourseRequest $request) : JsonResponse{
        $dto = new CourseDTO();
        $dto->title = $request->input('title');
        $dto->description = $request->input('description');
        $dto->category_id = (int) $request->input('category_id');
        $dto->price = (float) $request->input('price');
        $dto->instructor_id = auth()->id();

        $course = $this->courseService->createCourse($dto);
        return (new CourseResource($course))
            ->response()
            ->setStatusCode(201);
    }

    public function show(int $id) : JsonResponse{
        $course = $this->courseService->getCourseById($id);
        return $course
            ? (new CourseResource($course))->response()
            : response()->json(['error' => 'Course not found'], 404);
    }

    public function update(CourseRequest $request, int $id) : JsonResponse{
        $dto = new CourseDTO();
        $dto->title = $request->input('title');
        $dto->description = $request->input('description');
        $dto->category_id = (int) $request->input('category_id');
        $dto->price = (float) $request->input('price');
        $dto->instructor_id = auth()->id();

        $course = $this->courseService->updateCourse($id, $dto);
        return $course
            ? (new CourseResource($course))->response()
            : response()->json(['error' => 'Course not found'], 404);
    }

    public function destroy(int $id) : JsonResponse{
        $deleted = $this->courseService->deleteCourse($id);
        return $deleted
            ? response()->json(null, 204)
            : response()->json(['error' => 'Course not found'], 404);
    }
}
