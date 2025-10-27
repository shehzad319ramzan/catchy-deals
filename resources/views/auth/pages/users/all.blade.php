<x-layouts.auth page-title="All Users">

    @if (auth()->user()->can('add_user'))
        <x-slot name="sideButton">
            <!-- Add user Button -->
            <a href="{{ route('users.create', ['type' => request()->type]) }}" class="btn btn-primary mb-3">
                Add user
            </a>
        </x-slot>
    @endif

    <div class="row" style="min-height: 100vh !important;">
        <div class="col-md-12">
            <x-auth.card card-header="All Users">
                <x-auth.datatable>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['all'] as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                </td>
                                <td>{{ $user?->full_name }}</td>
                                <td>{{ $user?->email }}</td>
                                <td style="display: flex; justify-content: space-between; align-items: center;">
                                    @if (auth()->user()->can('view_user'))
                                        <x-action-buttons.detail route="{{ route('users.show', $user?->id) }}" />
                                    @endif

                                    @if (auth()->user()->can('edit_user'))
                                        <x-action-buttons.edit route="{{ route('users.edit', $user?->id) }}" />
                                    @endif

                                    @if (auth()->user()->can('delete_user'))
                                        <x-action-buttons.trash route="{{ route('users.destroy', $user?->id) }}" />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-auth.datatable>
            </x-auth.card>
        </div>
    </div>

</x-layouts.auth>
