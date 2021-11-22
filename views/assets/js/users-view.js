function preguntar(id) {
  if (confirm('Esta seguro de eliminar el esquema')) {
    location.href = "../controllers/users/UserController-delete.php?id=" + id;
  }
}