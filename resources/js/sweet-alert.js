import Swal from 'sweetalert2'

window.addEventListener('swal:modal', event => {
  Swal.fire({
    position: 'center',
    icon: event.detail.type,
    title: event.detail.title,
    text: event.detail.text,
    showConfirmButton: true,
    timer: false,
  })
});

window.addEventListener('swal:confirm', event => {
  Swal.fire({
    title: event.detail.title,
    text: event.detail.text,
    icon: event.detail.type,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((willDelete) => {
    if (willDelete.isConfirmed) {
      window.livewire.emit('delete', event.detail.id);
    }
  })
});