@extends('layout.form.form')

@section('head')
    <title>Form Transaksi Consumable</title>

    <style>
        .delete-button {
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            cursor: pointer;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
@endsection

@section('body')
    <div class="page-wrapper p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5 shadow">
                <div class="card-heading">
                    <h2 class="title">Form Transaksi Consumable</h2>
                </div>
                <div class="card-body shadow">
                    <form action="{{ route('masterdata-transaksi-consumable.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="name">Peminjam</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="{{ auth()->user()->name }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Penanggung jawab</div>
                            <div class="value">
                                <div class="input-group">
                                    @if (auth()->user()->status_employee == 'Organik')
                                        <input class="form-control" type="text" value="{{ auth()->user()->name }}"
                                            readonly>
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="responsible_id">
                                    @else
                                        <select name="responsible_id" class="form-select" required>
                                            <option value="" selected disabled>- Pilih Penanggung Jawab -</option>
                                            @foreach ($penanggung_jawab as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                    ({{ $item->jabatan ?? '-' }})
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name"></div>
                            <div class="value">
                                <div class="input-group">
                                    <select id="tools_id" class="form-select">
                                        <option value="" selected disabled>- Material -</option>
                                        @foreach ($consumable as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" placeholder="Qty." class="form-control" id="qty"
                                        min="1">
                                    <button type="button" class="btn btn-sm btn-info" onclick="addRow()">Add</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">List Material</div>
                            <div class="value">
                                <div class="input-group">
                                    <table id="table_show" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Material</th>
                                                <th class="text-center">Qty.</th>
                                                <th class="text-center text-wrap">#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <!-- Table rows will be added here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Remark</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea name="remark" placeholder="Nama pekerjaan (opsional)" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="pull-right mt-2">
                            <a href="{{ route('my-transaksi-consumable.index') }}" class="btn btn-danger shadow">
                                Cancel
                            </a>
                            <button class="btn btn-success ms-2 shadow" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $('#tools_id').on('change', function() {
            var consumable_id = this.value;
            $.ajax({
                url: '/check-stock-consumable?consumable_id=' + consumable_id,
                type: 'get',
                success: function(res) {
                    $('#qty').attr({
                        'max': res.stock,
                        'placeholder': 'stok: ' + res.stock,
                    });
                }
            });
        });

        function addRow() {
            const tools_id = document.getElementById('tools_id');
            const tools_id_value = tools_id.options[tools_id.selectedIndex].value;
            const tools_id_text = tools_id.options[tools_id.selectedIndex].text;

            const qty_id = document.getElementById('qty');
            const qty = parseFloat(qty_id.value);

            // Validasi bahwa kedua input harus diisi
            if (tools_id_value === '' || isNaN(qty)) {
                alert('Harap isi kedua input, Material & Qty.');
                tools_id.selectedIndex = 0;
                qty_id.value = '';
                return;
            }

            // Validasi bahwa input qty harus sesuai min & max
            const qty_min = parseFloat(qty_id.min);
            const qty_max = parseFloat(qty_id.max);
            if (isNaN(qty) || qty < qty_min || qty > qty_max) {
                alert('Qty melebihi stok yang tersedia.');
                tools_id.selectedIndex = 0;
                qty_id.value = '';
                return;
            }

            // Validasi bahwa nilai pada kolom A harus unik
            const tableRows = document.querySelectorAll('#tableBody tr');
            for (let i = 0; i < tableRows.length; i++) {
                const cell = tableRows[i].getElementsByTagName('td')[0];
                const existingValue = cell.querySelector('input[name="consumable_id[]"]').value;
                if (existingValue === tools_id_value) {
                    alert('Material ini sudah masuk dalam list order anda.');
                    tools_id.selectedIndex = 0;
                    qty_id.value = '';
                    return;
                }
            }

            const tableBody = document.getElementById('tableBody');
            const newRow = tableBody.insertRow();

            const cell1 = newRow.insertCell(0);
            const cell2 = newRow.insertCell(1);
            const cell3 = newRow.insertCell(2);

            cell1.innerHTML = `<input type="hidden" name="consumable_id[]" value="${tools_id_value}">${tools_id_text}`;
            cell2.innerHTML = `<input type="hidden" name="qty[]" value="${qty}">${qty}`;
            cell2.classList.add('text-center');
            cell3.classList.add('text-center');

            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'X';
            deleteButton.type = 'button';
            deleteButton.title = 'Cancel';
            deleteButton.classList.add('delete-button');
            deleteButton.onclick = function() {
                const row = this.parentNode.parentNode;
                row.parentNode.removeChild(row);
            };
            cell3.appendChild(deleteButton);

            // Reset dropdown values to the first option
            tools_id.selectedIndex = 0;
            qty_id.value = '';
        }

        $('.select').select2();
    </script>
@endsection
