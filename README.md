<h1><a href="https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/">WordPress PHP Coding Standards</a></h1>

### Here's a WordPress MU-Plugin (Must-Use Plugin)

that can help keep your post content concise by limiting the word count in post content. If a post exceeds the defined limit, it trims the content and appends a "<a href='https://developer.wordpress.org/advanced-administration/plugins/mu-plugins/'>Read More</a>" link.

<h3> <a href="https://developer.wordpress.org/reference/functions/apply_filters/">apply_filters()</a> Function in WordPress</h3>
The apply_filters() function is one of the most commonly used and powerful functions in WordPress. It is part of the WordPress Plugin API and allows developers to modify data before it is used or displayed. By using filters, you can change the default behavior of WordPress or plugins/themes without directly editing their core files.

---

# WordPress Hooks: `apply_filters()` and `do_action()`

WordPress provides two essential hook types for developers: **Filters** and **Actions**. These hooks allow you to modify or extend WordPress functionality without altering the core code. This document explains the purpose and usage of `apply_filters()` and `do_action()`.

---

## `apply_filters()`

The `apply_filters()` function is used to modify a value. It passes data through registered filter functions, which can alter or replace the value before it is returned.

### **Syntax**

```php
apply_filters( string $hook_name, mixed $value, mixed ...$args )
```

### **Parameters**

-   **`$hook_name`** _(string)_: The name of the filter hook.
-   **`$value`** _(mixed)_: The value to be filtered.
-   **`...$args`** _(mixed)_ _(Optional)_: Additional arguments passed to the filter functions.

### **Return Value**

Returns the filtered value after all callback functions have been applied.

### **Example**

```php
// Define a filter hook
function get_custom_message($message) {
    return apply_filters('custom_message', $message);
}

// Hook into the filter
add_filter('custom_message', function($message) {
    return $message . ' Have a great day!';
});

// Usage
echo get_custom_message('Hello, World!');
// Output: "Hello, World! Have a great day!"
```

---

## `do_action()`

The `do_action()` function allows you to execute functions hooked to a specific action. Unlike filters, actions do not return values; they are used to perform tasks like logging, sending emails, or modifying the database.

### **Syntax**

```php
do_action( string $hook_name, mixed ...$args )
```

### **Parameters**

-   **`$hook_name`** _(string)_: The name of the action hook.
-   **`...$args`** _(mixed)_ _(Optional)_: Additional arguments passed to the action functions.

### **Return Value**

`do_action()` does not return a value.

### **Example**

```php
// Define an action hook
do_action('custom_action', 'Hello, World!');

// Hook into the action
add_action('custom_action', function($message) {
    echo $message . ' This is a custom action.';
});

// Output: "Hello, World! This is a custom action."
```

---

## **Comparison of `apply_filters()` and `do_action()`**

| Feature | `apply_filters()` | `do_action()` |
| --- | --- | --- |
| **Purpose** | Modify data and return the result | Perform tasks without returning data |
| **Returns Value** | Yes | No |
| **Use Case** | Altering content or settings | Executing custom functionality |
| **Callback Function** | Must return a value | No return required |

---

## **Best Practices**

1. **Unique Hook Names**: Use unique and descriptive hook names to avoid conflicts.

    ```php
    apply_filters('plugin_slug_filter_name', $value);
    do_action('plugin_slug_action_name');
    ```

2. **Check Arguments**: Ensure your callback functions handle all passed arguments.

3. **Avoid Overloading**: Do not hook too many functions to the same filter or action to maintain performance.

4. **Documentation**: Clearly document your custom hooks in your plugin or theme code.

---

## Further Reading

-   [WordPress Filters API](https://developer.wordpress.org/plugins/hooks/filters/)
-   [WordPress Actions API](https://developer.wordpress.org/plugins/hooks/actions/)
