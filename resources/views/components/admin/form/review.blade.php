@wire('debounce.200ms')
<x-form-select name="service_id" label="Service Name" :options="Helper::getKeyValues('Service', 'title', 'id')"
    placeholder="Please Select" />

<x-form-input name="name" label="Name" type="text" />

<x-form-textarea name="message" label="message" required />

<x-form-input name="stars" label="No. of Stars" type="number" />

<x-admin.form.single-upload name="image" label="Image" />
@endwire
