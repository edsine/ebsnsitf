<?php

namespace Modules\DocumentManager\Http\Controllers\API;

use Modules\DocumentManager\Http\Requests\API\CreateMemoHasUserAPIRequest;
use Modules\DocumentManager\Http\Requests\API\UpdateMemoHasUserAPIRequest;
use Modules\DocumentManager\Models\MemoHasUser;
use Modules\DocumentManager\Repositories\MemoHasUserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Http\Resources\MemoHasUserResource;

/**
 * Class MemoHasUserController
 */

class MemoHasUserAPIController extends AppBaseController
{
    /** @var  MemoHasUserRepository */
    private $memoHasUserRepository;

    public function __construct(MemoHasUserRepository $memoHasUserRepo)
    {
        $this->memoHasUserRepository = $memoHasUserRepo;
    }

    /**
     * @OA\Get(
     *      path="/memo-has-users",
     *      summary="getMemoHasUserList",
     *      tags={"MemoHasUser"},
     *      description="Get all MemoHasUsers",
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
     *                  @OA\Items(ref="#/components/schemas/MemoHasUser")
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
        $memoHasUsers = $this->memoHasUserRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MemoHasUserResource::collection($memoHasUsers), 'Memo Has Users retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/memo-has-users",
     *      summary="createMemoHasUser",
     *      tags={"MemoHasUser"},
     *      description="Create MemoHasUser",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/MemoHasUser")
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
     *                  ref="#/components/schemas/MemoHasUser"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMemoHasUserAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $memoHasUser = $this->memoHasUserRepository->create($input);

        return $this->sendResponse(new MemoHasUserResource($memoHasUser), 'Memo Has User saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/memo-has-users/{id}",
     *      summary="getMemoHasUserItem",
     *      tags={"MemoHasUser"},
     *      description="Get MemoHasUser",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of MemoHasUser",
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
     *                  ref="#/components/schemas/MemoHasUser"
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
        /** @var MemoHasUser $memoHasUser */
        $memoHasUser = $this->memoHasUserRepository->find($id);

        if (empty($memoHasUser)) {
            return $this->sendError('Memo Has User not found');
        }

        return $this->sendResponse(new MemoHasUserResource($memoHasUser), 'Memo Has User retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/memo-has-users/{id}",
     *      summary="updateMemoHasUser",
     *      tags={"MemoHasUser"},
     *      description="Update MemoHasUser",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of MemoHasUser",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/MemoHasUser")
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
     *                  ref="#/components/schemas/MemoHasUser"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMemoHasUserAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var MemoHasUser $memoHasUser */
        $memoHasUser = $this->memoHasUserRepository->find($id);

        if (empty($memoHasUser)) {
            return $this->sendError('Memo Has User not found');
        }

        $memoHasUser = $this->memoHasUserRepository->update($input, $id);

        return $this->sendResponse(new MemoHasUserResource($memoHasUser), 'MemoHasUser updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/memo-has-users/{id}",
     *      summary="deleteMemoHasUser",
     *      tags={"MemoHasUser"},
     *      description="Delete MemoHasUser",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of MemoHasUser",
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
        /** @var MemoHasUser $memoHasUser */
        $memoHasUser = $this->memoHasUserRepository->find($id);

        if (empty($memoHasUser)) {
            return $this->sendError('Memo Has User not found');
        }

        $memoHasUser->delete();

        return $this->sendSuccess('Memo Has User deleted successfully');
    }
}
