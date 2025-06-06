document.addEventListener('DOMContentLoaded', function () {
  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.getElementById('toggleSidebar');
  const toggleIcon = document.getElementById('toggleIcon');

  // Para que el sidebar este de base siempre colapsado
  toggleIcon.className = 'bi bi-list'; // Icono de hamburguesa para cuando esta colapsado

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');

    if (sidebar.classList.contains('collapsed')) {
      toggleIcon.className = 'bi bi-list'; 

      // Para cerrar todo lo que estuviese abierto dentro del sidebar
      const collapsibles = sidebar.querySelectorAll('.collapse.show');
      collapsibles.forEach(collapseEl => {
        const bsCollapse = bootstrap.Collapse.getInstance(collapseEl);
        if (bsCollapse) {
          bsCollapse.hide();
        }
      });

    } else {
      toggleIcon.className = 'bi bi-x';  // Para cuando esta abierto, icono de X
    }
  });

  // Para que si clickas un icono, te abra el sidebar con esa opcion desplegada
  sidebar.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      if (sidebar.classList.contains('collapsed')) {
        sidebar.classList.remove('collapsed');
        toggleIcon.className = 'bi bi-x'; 

        // Para cerrar todo lo que estuviese abierto dentro del sidebar
        const collapsibles = sidebar.querySelectorAll('.collapse.show');
        collapsibles.forEach(collapseEl => {
          const bsCollapse = bootstrap.Collapse.getInstance(collapseEl);
          if (bsCollapse) {
            bsCollapse.hide();
          }
        });
      }
    });
  });

  // Para cerrar el sidebar si esta abierto y clickas fuera
  document.addEventListener('click', (event) => {
    const clickDentroSidebar = sidebar.contains(event.target);
    const clickEnToggle = toggleBtn.contains(event.target);

    if (!clickDentroSidebar && !clickEnToggle && !sidebar.classList.contains('collapsed')) {
      sidebar.classList.add('collapsed');
      toggleIcon.className = 'bi bi-list';

      // Para cerrar todo lo que estuviese abierto dentro del sidebar
      const collapsibles = sidebar.querySelectorAll('.collapse.show');
      collapsibles.forEach(collapseEl => {
        const bsCollapse = bootstrap.Collapse.getInstance(collapseEl);
        if (bsCollapse) {
          bsCollapse.hide();
        }
      });
    }
  });
});
