<?php

namespace App\Http\Controllers;

use App\Enums\LeadStatus;
use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request): RedirectResponse|JsonResponse
    {
        $data = $request->validated();

        $lead = Lead::firstOrCreate(
            ['email' => $data['email']],
            [
                'source' => $data['source'] ?? $request->headers->get('referer'),
                'status' => LeadStatus::Pending,
            ]
        );

        $wasRecentlyCreated = $lead->wasRecentlyCreated;

        if (! $wasRecentlyCreated && ! empty($data['project_id'])) {
            Log::info('Lead re-submitted', [
                'email' => $lead->email,
                'project_id' => $data['project_id'],
            ]);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'message' => $wasRecentlyCreated
                    ? '¡Gracias! Te hemos añadido a la lista de espera.'
                    : 'Este email ya estaba registrado. ¡Gracias por el interés!',
                'already_registered' => ! $wasRecentlyCreated,
            ], $wasRecentlyCreated ? 201 : 200);
        }

        return back()
            ->with('waitlist_status', $wasRecentlyCreated ? 'created' : 'exists')
            ->with('waitlist_email', $lead->email);
    }
}
