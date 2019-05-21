<?php

/**
 * @file
 * Contains Drupal\linkedin_feed\Form\SettingsForm.
 */

namespace Drupal\linkedin_feed\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 *
 * @package Drupal\linkedin_feed\Form
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'linkedin_feed.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('linkedin_feed.settings');
    $form['api'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('API Base'),
      '#default_value' => $config->get('api'),
    );
    $form['client_id'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Client ID'),
      '#default_value' => $config->get('client_id'),
    );
    $form['client_secret'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Client Secret'),
      '#default_value' => $config->get('client_secret'),
    );
    $form['auth_token'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Auth Token'),
      '#default_value' => $config->get('auth_token'),
    );
    $form['user_id'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('User Id'),
      '#default_value' => $config->get('user_id'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('linkedin_feed.settings')
      ->set('api', $form_state->getValue('api'))
      ->set('client_id', $form_state->getValue('client_id'))
      ->set('client_secret', $form_state->getValue('client_secret'))
      ->set('auth_token', $form_state->getValue('auth_token'))
      ->set('user_id', $form_state->getValue('user_id'))
      ->save();
  }

}
