function preguntar(id) {
  if (confirm('Esta seguro de eliminar el Usuario')) {
    location.href = "../controllers/users/UserController-delete.php?id=" + id;
  }
}