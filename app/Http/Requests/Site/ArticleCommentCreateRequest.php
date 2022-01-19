<?php

namespace App\Http\Requests\Site;

use App\Enum\PermissionsEnum;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ArticleCommentCreateRequest.
 * Обработка запроса формы создания комментария.
 *
 * @package App\Http\Requests\Site
 */
class ArticleCommentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can(PermissionsEnum::SITE_ARTICLE_COMMENT_CREATE);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'comment.article_id' => 'required|integer|exists:App\Models\Article\Article,id',
            'comment.text' => 'required|max:1000',
            'comment.user_id' => 'required',
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'comment' => [
                'text' => trim(strip_tags($this->comment['text'] ?? '')),
                'article_id' => (int)$this->route('article'),
                'user_id' => $this->user()?->id,
            ],
        ]);
    }
}
