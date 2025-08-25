<?php
namespace App\Http\Requests\Announcement; use Illuminate\Foundation\Http\FormRequest;
class StoreAnnouncementRequest extends FormRequest{ public function authorize():bool{ return auth()->check()&&auth()->user()->isAdmin(); } public function rules():array{ return ['title'=>['required','string','max:180'],'content'=>['required','string'],'category'=>['nullable','string','max:60']]; }}