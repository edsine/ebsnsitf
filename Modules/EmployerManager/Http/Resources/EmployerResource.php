<?php

namespace Modules\EmployerManager\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'ecs_number' => $this->ecs_number,
            'company_name' => $this->company_name,
            'company_email' => $this->company_email,
            'company_address' => $this->company_address,
            'company_rcnumber' => $this->company_rcnumber,
            'company_phone' => $this->company_phone,
            'company_localgovt' => $this->company_localgovt,
            'company_state' => $this->company_state,
            'business_area' => $this->business_area,
            'inspection_status' => $this->inspection_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by
        ];
    }
}
