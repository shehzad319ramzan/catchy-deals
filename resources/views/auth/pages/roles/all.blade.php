<x-layouts.auth page-title="All Roles">
    <div class="row">
        <div class="col-md-12">
            <x-auth.card card-header="Create new role" header-button="true">
                <x-auth.form form-action="{{ route('roles.store') }}">
                    <div class="row">
                        <div class="col-md-4">
                            <x-auth.input-field type="text" name="name" id="name" place="Enter name"
                                val="" required="true" label="" />
                        </div>
                        <div class="col-md-4">
                            <x-auth.input-field type="text" name="title" id="title" place="Enter title"
                                val="" required="true" label="" />
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-12">
                            <x-auth.input-button btn-class="mt-3" btn-value="Create" btn-type="submit" />
                        </div>

                    </div>
                </x-auth.form>
            </x-auth.card>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <x-auth.card card-header="Roles & Permissions" header-button="true">
                <x-auth.datatable>
                    <thead>
                        <tr>
                            <th>Roles</th>

                            @foreach ($permissions as $permissionTh)
                                <th class="text-center">{{ $permissionTh->title }}</th>
                            @endforeach

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <th>{{ $role?->title }}</th>

                                @foreach ($permissions as $permission)
                                    <td>
                                        <div
                                            class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                            <input class="form-check-input permission-check-box"
                                                data-role="{{ $role->id }}" data-permission="{{ $permission->id }}"
                                                type="checkbox"
                                                {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                @endforeach

                                <td style="display: flex; justify-content: space-between; align-items: center;">
                                    @if (auth()->user()->can('delete_role'))
                                        <x-action-buttons.trash
                                            route="{{ route('roles.destroy', ['role' => $role->id]) }}" />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-auth.datatable>
            </x-auth.card>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".permission-check-box");

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener("change", function() {
                    const permission = this.getAttribute("data-permission");
                    const role = this.getAttribute("data-role");
                    const isChecked = this.checked;

                    var form = new FormData();
                    form.append("status", isChecked ? 1 : 0);
                    form.append("role", role);
                    form.append("permission", permission);
                    form.append("_token", "{{ csrf_token() }}");

                    var settings = {
                        url: "{{ route('roles.assign_permission', '') }}",
                        method: "POST",
                        processData: false,
                        contentType: false,
                        data: form,
                        success: function(response) {
                            if (response.success) {
                                showToaster('success', response.success, 'Success')
                            }

                            if (response.warning) {
                                showToaster('warning', response.warning, 'Warning')
                            }
                        },
                        error: function() {
                            console.error("Request failed");
                        }
                    };
                    $.ajax(settings);
                });
            });

        });
    </script>

</x-layouts.auth>
