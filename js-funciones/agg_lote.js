function agg_lote(){
    Swal.fire({
    title: `Agregar Lote nuevo`,
    html: `
    <form class="container" action="guardar_lote.php" method="post">
        <div class="input-group input-group-static is-filled">
        <label for="nombre_lote">Nombre del Lote:</label>
        <input type="text" class="form-control" id="nombre_lote" name="nombre_lote" required>
        </div>
        <div class="input-group input-group-static is-filled">
        <label for="numero_lote">Número del Lote:</label>
        <input type="text" class="form-control" id="numero_lote" name="numero_lote" required>
        </div>
        <div class="input-group input-group-static is-filled">
        <label for="coordenada1">Coordenadas en Y:</label>
        <input type="text" class="form-control" id="coordenada1" name="coordenada1" required>
        </div>
        <div class="input-group input-group-static is-filled">
        <label for="coordenada2">Coordenadas en X:</label>
        <input type="text" class="form-control" id="coordenada2" name="coordenada2" required>
        </div>

        <style>
        input[type="color"].custom {
            --size: 35px;
            width: var(--size);
            height: var(--size);
            background: none;
            padding: 0;
            border: 0;

            &::-webkit-color-swatch-wrapper {
            width: var(--size);
            height: var(--size);
            padding: 0;
            }

            &::-webkit-color-swatch {
            border: 3px solid dark;
            border-radius: 50%;
            }
        }

        </style>
        <div class="input-group  is-filled p-2">
        <input type="color" class="custom" id="color_punto" name="color_punto" value="#d6d6d6" required>
        <label class="mt-2 ms-2" for="color_punto">Seleccione el color del punto</label>
        </div>

        <button type="submit" class="btn mx-auto mt-2 btn-sm btn-success">Guardar</button>
    </form>
    `,
    showCloseButton: true,
    showCancelButton: false,
    showConfirmButton: false,
    });
}
