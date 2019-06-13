<?php

namespace Drupal\ffw_custom\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class OfficeForm.
 */
class OfficeForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $office = $this->entity;
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#maxlength' => 255,
      '#default_value' => $office->name(),
      '#description' => $this->t("Name for the Office."),
      '#required' => TRUE,
    ];


    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $office->label(),
      '#description' => $this->t("Label for the Office."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $office->id(),
      '#machine_name' => [
        'exists' => '\Drupal\ffw_custom\Entity\Office::load',
      ],
      '#disabled' => !$office->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $office = $this->entity;
    $status = $office->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Office.', [
          '%label' => $office->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Office.', [
          '%label' => $office->label(),
        ]));
    }
    $form_state->setRedirectUrl($office->toUrl('collection'));
  }

}
