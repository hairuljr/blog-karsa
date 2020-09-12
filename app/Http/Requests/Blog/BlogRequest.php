<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'category_blog' => 'required|exists:categories,id',
      'title' => 'required|string',
      'writer' => 'required|string',
      'date_publish' => 'required',
      'content' => 'required',
      'status' => 'required|string|in:PUBLISH,PENDING'
    ];
  }
}
