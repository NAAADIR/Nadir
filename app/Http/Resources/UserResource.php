<?php

namespace App\Http\Resources;

use App\Http\Resources\Account\AccountResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'gender' => $this->gender,
            'phone_office' => $this->phone_office,
            'phone_mobile' => $this->phone_mobile,
            'position' => $this->position,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'is_notifiable' => $this->is_notifiable,
            'image_path' => $this->image_path,
            'params' => json_decode($this->params),
            'preferences' => json_decode($this->preferences),
            'is_admin' => $this->is_admin,
            // 'role' => $this->roles->first()->name,
            'last_login_at' => Carbon::createFromDate($this->last_login_at)->format('Y-m-d H:m:s'),
            'created_at' => Carbon::createFromDate($this->created_at)->format('Y-m-d H:m:s'),
            'updated_at' => Carbon::createFromDate($this->updated_at)->format('Y-m-d H:m:s'),
            'deleted_at' => Carbon::createFromDate($this->deleted_at)->format('Y-m-d H:m:s')
        ];
    }
}
