# Re-usable fields

Re-usable fields are not intended to be used directly but to be used as a clone element for other features. When registering re-usable fields the sub_field names should NOT be prefixed by the main field name. For example a button would have a `group` field with a name of `button` and a `select` sub field with a name of `type` NOT `button_type`. The reason for this is that sub fields only exist in the context of the main field and so it is protected from naming collisions.

Re-usable Field Example:

```php
$new_fields = array(
  array(
    'key'        => 'field_button',
    'label'      => __( 'Button', 'wsk-theme' ),
    'name'       => 'button',
    'type'       => 'group',
    'sub_fields' => array(
      array(
        'key'           => 'field_button_type',
        'label'         => __( 'Type', 'wsk-theme' ),
        'name'          => 'type',
        'type'          => 'select',
        'wrapper'       => array(
          'class' => 'acf-hidden',
        ),
        'choices'       => array(
          'primary'   => __( 'Primary', 'wsk-theme' ),
          'secondary' => __( 'Secondary', 'wsk-theme' ),
        ),
        'default_value' => 'primary',
        'return_format' => 'value',
      ),
      array(
        'key'           => 'field_button_link',
        'label'         => __( 'Link', 'wsk-theme' ),
        'name'          => 'link',
        'type'          => 'link',
        'return_format' => 'array',
      ),
    ),
  ),
);
```
