<?php

namespace Modules\DocumentManager\Http\Controllers\API;

use Modules\DocumentManager\Http\Requests\API\CreateMemoHasDepartmentAPIRequest;
use Modules\DocumentManager\Http\Requests\API\UpdateMemoHasDepartmentAPIRequest;
use Modules\DocumentManager\Models\MemoHasDepartment;
use Modules\DocumentManager\Repositories\MemoHasDepartmentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Http\Resources\MemoHasDepartmentResource;

/**
 * Class MemoHasDepartmentController
 */

class MemoHasDepartmentAPIController extends AppBaseController
{
    /** @var  MemoHasDepartmentRepository */
    private $memoHasDepartmentRepository;

    public function __construct(MemoHasDepartmentRepository $memoHasDepartmentRepo)
    {
        $this->memoHasDepartmentRepository = $memoHasDepartmentRepo;
    }

    /**
     * @OA\Get(
     *      path="/memo-has-departments",
     *      summary="getMemoHasDepartmentList",
     *      tags={"MemoHasDepartment"},
     *      description="Get all MemoHasDepartments",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/MemoHasDepartment")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $memoHasDepartments = $this->memoHasDepartmentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MemoHasDepartmentResource::collection($memoHasDepartments), 'Memo Has Departments retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/memo-has-departments",
     *      summary="createMemoHasDepartment",
     *      tags={"MemoHasDepartment"},
     *      description="Create MemoHasDepartment",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/MemoHasDepartment")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/MemoHasDepartment"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMemoHasDepartmentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $memoHasDepartment = $this->memoHasDepartmentRepository->create($input);

        return $this->sendResponse(new MemoHasDepartmentResource($memoHasDepartment), 'Memo Has Department saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/memo-has-departments/{id}",
     *      summary="getMemoHasDepartmentItem",
     *      tags={"MemoHasDepartment"},
     *      description="Get MemoHasDepartment",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of MemoHasDepartment",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/MemoHasDepartment"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id): JsonResponse
    {
        /** @var MemoHasDepartment $memoHasDepartment */
        $memoHasDepartment = $this->memoHasDepartmentRepository->find($id);

        if (empty($memoHasDepartment)) {
            return $this->sendError('Memo Has Department not found');
        }

        return $this->sendResponse(new MemoHasDepartmentResource($memoHasDepartment), 'Memo Has Department retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/memo-has-departments/{id}",
     *      summary="updateMemoHasDepartment",
     *      tags={"MemoHasDepartment"},
     *      description="Update MemoHasDepartment",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of MemoHasDepartment",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/MemoHasDepartment")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/MemoHasDepartment"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMemoHasDepartmentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var MemoHasDepartment $memoHasDepartment */
        $memoHasDepartment = $this->memoHasDepartmentRepository->find($id);

        if (empty($memoHasDepartment)) {
            return $this->sendError('Memo Has Department not found');
        }

        $memoHasDepartment = $this->memoHasDepartmentRepository->update($input, $id);

        return $this->sendResponse(new MemoHasDepartmentResource($memoHasDepartment), 'MemoHasDepartment updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/memo-has-departments/{id}",
     *      summary="deleteMemoHasDepartment",
     *      tags={"MemoHasDepartment"},
     *      description="Delete MemoHasDepartment",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of MemoHasDepartment",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id): JsonResponse
    {
        /** @var MemoHasDepartment $memoHasDepartment */
        $memoHasDepartment = $this->memoHasDepartmentRepository->find($id);

        if (empty($memoHasDepartment)) {
            return $this->sendError('Memo Has Department not found');
        }

        $memoHasDepartment->delete();

        return $this->sendSuccess('Memo Has Department deleted successfully');
    }
}
