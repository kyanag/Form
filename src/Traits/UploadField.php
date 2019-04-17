<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/17
 * Time: 9:55
 */

namespace Kyanag\Form\Traits;

use Kyanag\Form\Field;
use function Kyanag\Form\object_create;

/**
 * Trait UploadField
 * @package Kyanag\Form\Traits
 * @mixin Field
 */
trait UploadField
{

    protected $buttonOptions = [
        'showRemove' => false,
        'showDrag'   => false,
    ];

    protected function defaultOptions(){
        return [
            'language'              =>"zh",
            'autoReplace'           => true,
            'maxFileCount'          => 1,
            'overwriteInitial'      => true,
            'initialPreviewAsData'  => true,
            'showRemove'            => false,
            'showUpload'            => false,
            'dropZoneEnabled'       => false,
            'theme'                 => "fas",
            //'uploadUrl'            => object_create(["@id" => "form.file.upload_url"]),
            'initialPreviewConfig'  => [
                ['caption' => basename($this->value), 'key' => 0],
            ]
        ];
    }

    public function resourceUrl(){
        return object_create(["@id" => "form.file.domain"]) . $this->value;
    }

    public function getOptionsAttribute(){
        return [
            'initial-preview' => $this->resourceUrl(),
            'initial-caption' => $this->value,
            'config' => base64_encode(json_encode($this->defaultOptions())),
        ];
    }

}