<?php

namespace Drupal\ffw_custom\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Office entity.
 *
 * @ConfigEntityType(
 *   id = "office",
 *   label = @Translation("Office"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\ffw_custom\OfficeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\ffw_custom\Form\OfficeForm",
 *       "edit" = "Drupal\ffw_custom\Form\OfficeForm",
 *       "delete" = "Drupal\ffw_custom\Form\OfficeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\ffw_custom\OfficeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "office",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/office/{office}",
 *     "add-form" = "/admin/structure/office/add",
 *     "edit-form" = "/admin/structure/office/{office}/edit",
 *     "delete-form" = "/admin/structure/office/{office}/delete",
 *     "collection" = "/admin/structure/office"
 *   }
 * )
 */
class Office extends ConfigEntityBase implements OfficeInterface {

  /**
   * The Office ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Office label.
   *
   * @var string
   */
  protected $label;

  /**
   * The Office name.
   *
   * @var string
   */
  protected $name;


}
