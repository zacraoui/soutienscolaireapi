@extends('layouts.admin')
@section('content')

    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Liste des Enseignants
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table
                                class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                <tr>
                                    <th>Nom d'utilisateur</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Attachments</th>
                                    <th class="w-1"></th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                        {{ dd($users) }}--}}
                                @foreach($users as $user)
                                    <tr>
                                    <td data-label="Name" >
                                        <div class="d-flex py-1 align-items-center">
                                            <span class="avatar me-2" style="background-image: url(./static/avatars/010m.jpg)"></span>
                                            <div class="flex-fill">
                                                <div class="font-weight-medium">{{ $user->civilite .'. '. $user->nom. ' '.$user->prenom  }}</div>
                                                <div class="text-muted">{{ $user->email }}</div>
                                                <div class="text-muted">{{ $user->enseignant->cin }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Title" >
                                        <div>{{ $user->ville.', '.$user->quartier }}</div>
                                        <div class="text-muted">{{ $user->adresse }}</div>
                                    </td>
                                    <td data-label="Role" >
                                        <div class="text-muted">Portable : {{ $user->tel }}</div>
                                        <div class="text-muted">Fix : {{ $user->fix }}</div>

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.cv.download',$user->slug) }}" class="btn btn-blue">
                                            CV
                                        </a>
                                        <a href="{{ route('admin.lettre.download',$user->slug) }}" class="btn btn-blue">
                                            LM
                                        </a>

                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            @if(!$user->enseignant->status)
                                            <a id="valider_enseignant" class="btn btn-white" data-slug="{{ $user->slug }}">
                                                Valider
                                            </a>
                                            @else
                                            <a id="valider_enseignant" class="btn btn-white" data-slug="{{ $user->slug }}">
                                                Invalider
                                            </a>
                                            @endif
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Supprimer
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        // Swal.fire(
        //     'The Internet?',
        //     'That thing is still around?',
        //     'question'
        // )
        let url = window.location.origin
        $('body').on('click','#valider_enseignant',function(e){
            e.preventDefault()
            let slug = $(this).data('slug')
            // let data = {
            //     slug : slug,
            // }
            let path = url + '/dashboard/valid-teacher' + '/'  + slug
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Es-tu sûr?',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui',
                cancelButtonText: 'Annuler!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                axios.get(path)
                    .then(function(res){
                        if(res.data){
                            $('#valider_enseignant').text('Invalider');
                            swalWithBootstrapButtons.fire(
                                'Valider!',
                                'A été validé avec succès.',
                                'success'
                            )
                        }
                        else{
                            $('#valider_enseignant').text('Valider');
                            swalWithBootstrapButtons.fire(
                                'Invalider!',
                                'Invalidation terminée avec succès.',
                                'success'
                            )
                        }
                    })
                } else if (result.dismiss === Swal.DismissReason.cancel){
                    swalWithBootstrapButtons.fire(
                        'Annulé',
                        '',
                        'error'
                    )
                }
            })

        });
    </script>
@endsection
