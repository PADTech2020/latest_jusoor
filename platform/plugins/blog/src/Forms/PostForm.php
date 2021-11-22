<?php

namespace Botble\Blog\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\Fields\TagField;
use Botble\Base\Forms\FormAbstract;
use Botble\Blog\Forms\Fields\CategoryMultiField;
use Botble\Blog\Forms\Fields\CircuitMultiField;
use Botble\Blog\Http\Requests\PostRequest;
use Botble\Blog\Models\Post;
use Botble\Blog\Repositories\Interfaces\CategoryInterface;
use Botble\Circuit\Repositories\Interfaces\CircuitInterface;
use Botble\Researchers\Models\Researchers;

class PostForm extends FormAbstract
{

    /**
     * @var string
     */
    protected $template = 'core/base::forms.form-tabs';

    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    public function buildForm()
    {
        $selectedCategories = [];
        if ($this->getModel()) {
            $selectedCategories = $this->getModel()->categories()->pluck('category_id')->all();
        }

        $selectedCircuits = [];
        if ($this->getModel()) {
            $selectedCircuits = $this->getModel()->circuits()->pluck('circuit_id')->all();
        }

        $researchers = Researchers::getALlResearchers();
        if (empty($selectedCategories)) {
            $selectedCategories = app(CategoryInterface::class)
                ->getModel()
                ->where('is_default', 1)
                ->pluck('id')
                ->all();
        }

//        if (empty($selectedCiruits)) {
//            $selectedCircuits = app(CircuitInterface::class)
//                ->getModel()
//                ->where('is_default', 1)
//                ->pluck('id')
//                ->all();
//
//        }
//        dd($selectedCircuits);
        $tags = null;

        if ($this->getModel()) {
            $tags = $this->getModel()->tags()->pluck('name')->all();
            $tags = implode(',', $tags);
        }

        if (!$this->formHelper->hasCustomField('categoryMulti')) {
            $this->formHelper->addCustomField('categoryMulti', CategoryMultiField::class);
        }

        if (!$this->formHelper->hasCustomField('circuitMulti')) {
            $this->formHelper->addCustomField('circuitMulti', CircuitMultiField::class);
        }


        $this
            ->setupModel(new Post)
            ->setValidatorClass(PostRequest::class)
            ->withCustomFields()
            ->addCustomField('tags', TagField::class)
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('caption', 'textarea', [
                'label' => trans('core/base::forms.caption'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 1,
                    'placeholder' => trans('core/base::forms.caption_placeholder'),
                    'data-counter' => 100,
                ],
            ])
            ->add('description', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])
            ->add('is_featured', 'onOff', [
                'label' => trans('core/base::forms.is_featured'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('trending', 'onOff', [
                'label' => trans('core/base::forms.trending'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('is_popular', 'onOff', [
                'label' => trans('core/base::forms.is_popular'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('content', 'editor', [
                'label' => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('youtube_link', 'text', [
                'label' => trans('Youtube Link'),
                'label_attr' => ['class' => 'control-label '],
                'attr' => [
                    'placeholder' => trans('Youtube Link'),
                    'data-counter' => 120,
                ],
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => BaseStatusEnum::labels(),
            ])
            ->add('format_type', 'customRadio', [
                'label' => trans('plugins/blog::posts.form.format_type'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => get_post_formats(true),
            ])
            ->add('researcher_id', 'select', [
                'label' => __('Researcher'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => $researchers,
            ])
            ->add('categories[]', 'categoryMulti', [
                'label' => trans('plugins/blog::posts.form.categories'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => get_categories_with_children(),
                'value' => old('categories', $selectedCategories),
            ])
            ->add('circuits[]', 'circuitMulti', [
                'label' => trans('plugins/blog::posts.form.circuits'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => get_circuits_with_children(),
                'value' => old('circuits', $selectedCircuits),
            ])
            ->add('image', 'mediaImage', [
                'label' => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('tag', 'tags', [
                'label' => trans('plugins/blog::posts.form.tags'),
                'label_attr' => ['class' => 'control-label'],
                'value' => $tags,
                'attr' => [
                    'placeholder' => __('Write some tags'),
                    'data-url' => route('tags.all'),
                ],
            ])
            ->setBreakFieldPoint('status');
    }
}
