<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'All',
        'yes' => 'Yes',
        'no' => 'No',
        'copyright' => 'Copyright',
        'custom' => 'Custom',
        'actions' => 'Actions',
        'active' => 'Active',
        'buttons' => [
            'save' => 'Save',
            'update' => 'Update',
        ],
        'hide' => 'Hide',
        'inactive' => 'Inactive',
        'none' => 'None',
        'show' => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
        'create_new' => 'Create New',
        'toolbar_btn_groups' => 'Toolbar with button groups',
        'more' => 'More',
        'import' => 'Import',
    ],

    'backend' => [
        'common' => [
            'name' => "Name",
            'email' => 'E-mail',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'age' => 'Age',
            'phone' => 'Phone',
            'gender' => "Gender",
            'marital_status' => "Marital Status",
            'ethnic_group' => "Ethnic Group",
            'country' => "Country",
            'city' => "City",
            'district' => 'District',
            'commune' => 'Commune',
            'address' => 'Address',
            'full_address' => 'Full Address',
            'code' => 'Code',
        ],
        'customer' => [
            'management' => 'Customer Management',
            'create' => "Create Customer",
            'edit' => "Edit Customer",
            'total' => 'customer total|customers total',
            'deleted' => 'Deleted Customers',
            'customer_actions' => 'Customer Actions',
        ],
        'apartment' => [
            'management' => 'Apartment Management',
            'create' => "Create Apartment",
            'edit' => "Edit Apartment",
            'total' => 'apartment total|apartment total',
            'apartment_name' => 'Apartment Name',
            'color' => 'Color',
            'number_of_floors' => "Number Of Floors",
            'number_of_rooms' => 'Number Of Rooms',
            'owner' => "Owner",
            'actions' => 'Apartment Actions',
        ],
        'room' => [
            'management' => 'Room Management',
            'create' => "Create Room",
            'edit' => "Edit Room",
            'total' => 'apartment total|apartment total',
            'air_conditional' => 'Air Conditional',
            'bath_room' => 'Bath Room',
            'chair' => "Chair",
            'cabinet' => 'Cabinet',
            'bed' => "Bed",
            'width' => "width",
            'way' => "Way",
            'floor' => "Floor",
            'electric_water_heater' => "Electric Water Heater",
            'feature' => "Feature",
            'price' => "Price",
            'actions' => 'Room Actions',
        ],
        'country' => [
            'management' => 'Country Management',
            'create' => "Create Country",
            'edit' => "Edit Country",
            'total' => 'country total|country total',
            'two_letter_iso_code' => 'Two Letter Iso Code',
            'three_letter_iso_code' => 'Three Letter Iso Code',
            'nationality' => "Nationality",
            'country_actions' => 'Country Actions',
        ],
        'city' => [
            'management' => 'City Management',
            'create' => "Create City",
            'edit' => "Edit City",
            'total' => 'city total|city total',
            'city_actions' => 'City Actions',
        ],
        'district' => [
            'management' => 'District Management',
            'create' => "Create District",
            'edit' => "Edit District",
            'total' => 'district total|district total',
            'district_actions' => 'District Actions',
        ],
        'commune' => [
            'management' => 'Commune Management',
            'create' => "Create Commune",
            'edit' => "Edit Commune",
            'total' => 'commune total|commune total',
            'commune_actions' => 'Commune Actions',
        ],
        'contract' => [
            'management' => 'Contract Management',
            'create' => "Create Contract",
            'edit' => "Edit Contract",
            'total' => 'contract total|contract total',
            'commune_actions' => 'Contract Actions',
            'apartment_id' => 'Apartment',
            'room_id' => 'Room',
            'checkin' => 'Checkin',
            'checkout' => 'Checkout',
            'is_checkout' => 'Is Checkout',
            'description' => 'Description',
            'total_price' => 'Total Price',
            'service_list' => 'Service List',
        ],
        'access' => [
            'roles' => [
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total',
                ],
            ],

            'users' => [
                'active' => 'Active Users',
                'all_permissions' => 'All Permissions',
                'change_password' => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'management' => 'User Management',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',
                'user_actions' => 'User Actions',

                'table' => [
                    'confirmed' => 'Confirmed',
                    'created' => 'Created',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'permissions' => 'Permissions',
                    'abilities' => 'Abilities',
                    'roles' => 'Roles',
                    'social' => 'Social',
                    'total' => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history' => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Confirmed',
                            'created_at' => 'Created At',
                            'deleted_at' => 'Deleted At',
                            'email' => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Last Updated',
                            'name' => 'Name',
                            'first_name' => 'First Name',
                            'last_name' => 'Last Name',
                            'status' => 'Status',
                            'timezone' => 'Timezone',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'expired_password_box_title' => 'Your password has expired.',
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'update_password_button' => 'Update Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],
    ],
];
