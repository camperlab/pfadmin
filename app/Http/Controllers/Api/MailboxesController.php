<?php
namespace App\Http\Controllers\Api;

use App\Models\Mailbox;
use App\Repositories\MailboxRepository;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Api\{UpdateMailboxRequest, CreateMailboxRequest};
use Illuminate\Http\{Request, JsonResponse};

class MailboxesController extends ApiController
{
    /**
     * @var MailboxRepository
     */
    public MailboxRepository $mailboxRepository;

    /**
     * @param MailboxRepository $mailboxRepository
     */
    public function __construct(MailboxRepository $mailboxRepository)
    {
        $this->mailboxRepository = $mailboxRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->respond(Mailbox::all());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request)
    {
        $mailbox = $this->mailboxRepository->findByUsername($request->get('username'));
        return $mailbox ? $this->respond($mailbox) : $this->respondNoContent();
    }

    /**
     * @param CreateMailboxRequest $request
     * @return JsonResponse
     */
    public function store(CreateMailboxRequest $request)
    {
        $this->mailboxRepository->create($request->validated());
        return $this->respondSuccess();
    }

    /**
     * @param UpdateMailboxRequest $request
     * @return JsonResponse
     */
    public function update(UpdateMailboxRequest $request)
    {
        $isUpdated = $this->mailboxRepository->update($request->validated());
        return $isUpdated ? $this->respondSuccess() : $this->respondError('Error updating mailbox', 204);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->mailboxRepository->delete($request->get('username'));
        return $this->respondSuccess();
    }
}
