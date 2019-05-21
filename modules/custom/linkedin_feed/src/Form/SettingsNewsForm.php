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
class SettingsNewsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'news_feed.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'settings_news_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('news_feed.settings');
    $form['api_url'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('API Base'),
      '#default_value' => $config->get('api_url'),
    );
    $form['api_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('API KEY'),
      '#default_value' => $config->get('api_key'),
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

    $this->config('news_feed.settings')
      ->set('api_url', $form_state->getValue('api_url'))
      ->set('api_key', $form_state->getValue('api_key'))
      ->save();
  }
}
