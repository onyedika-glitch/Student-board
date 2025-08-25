<?php
namespace App\Http\Requests\Announcement; use Illuminate\Foundation\Http\FormRequest;
class UpdateAnnouncementRequest extends FormRequest{ public function authorize():bool{ return auth()->check()&&auth()->user()->isAdmin(); } public function rules():array{ return ['title'=>['sometimes','string','max:180'],'content'=>['sometimes','string'],'category'=>['nullable','string','max:60']]; }}