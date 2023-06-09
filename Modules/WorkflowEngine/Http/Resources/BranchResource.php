<?php

namespace Modules\WorkflowEngine\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'branch_name' => $this->branch_name,
            'branch_region' => $this->branch_region,
            'branch_code' => $this->branch_code,
            'last_ecsnumber' => $this->last_ecsnumber,
            'highest_rank' => $this->highest_rank,
            'staff_strength' => $this->staff_strength,
            'managing_id' => $this->managing_id,
            'branch_email' => $this->branch_email,
            'branch_phone' => $this->branch_phone,
            'branch_address' => $this->branch_address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
