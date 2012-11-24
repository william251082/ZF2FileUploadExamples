<?php

namespace ZF2FileUploadExamples\Form;

use Zend\InputFilter;
use Zend\Form\Form;
use Zend\Form\Element;

class ProgressUpload extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->addElements();
        $this->setInputFilter($this->createInputFilter());
    }

    public function addElements()
    {
        // File Input
        $file = new Element\File('file');
        $file
            ->setLabel('File Input')
            ->setAttributes(array(
                'id' => 'file',
                'multiple' => true
            ));
        $this->add($file);

        // Progress ID
        $progressId = new Element\File\SessionProgress();
        $this->add($progressId);
        $this->byName['progressId'] = $progressId; // Add an alias for the view
    }

    public function createInputFilter()
    {
        $inputFilter = new InputFilter\InputFilter();

        // File Input
        $file = new InputFilter\FileInput('file');
        $file->setRequired(true);
        $inputFilter->add($file);

        return $inputFilter;
    }
}