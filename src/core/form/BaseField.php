<?php

namespace notas\src\core\form;

use notas\src\core\Model;

/**
 * Class BaseField
 *
 */
abstract class BaseField
{

    public Model $model;
    public string $attribute;
    public string $type;

    /**
     * Field constructor.
     *
     * @param \notas\src\core\Model $model
     * @param string          $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('<div class="form-group">
            <label>%s</label>
            %s
            <div class="invalid-feedback">
            %s
            </div>
            </div>',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }

    abstract public function renderInput();
}
