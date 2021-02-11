<?php

use Composite\{Form, FieldSetElement, InputElement, LabelElement};

spl_autoload_register();

$form = new Form;
$form->addInput(new LabelElement(for: 'name', text: 'Name'));
$form->addInput(new InputElement(id: 'name'));

$fieldset = new FieldSetElement;
$fieldset->addInput(new LabelElement(for: 'email', text: 'Email'));
$fieldset->addInput(new InputElement(id: 'email'));
$fieldset->addInput(new LabelElement(for: 'address', text: 'Address'));
$fieldset->addInput(new InputElement(id: 'address'));

$form->addInput($fieldset);

echo $form->render();

