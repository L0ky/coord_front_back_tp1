<div class="container">
    <h1>Scraped Data</h1>

    <table class="p-datatable">
        <thead>
            <tr>
                <th class="p-datatable-headercell">Quote</th>
                <th class="p-datatable-headercell">Author</th>
                <th class="p-datatable-headercell">Tags</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataFrame['citation'] as $key => $quote)
                <tr>
                    <td class="p-datatable-bodycell">{{ $quote }}</td>
                    <td class="p-datatable-bodycell">{{ $dataFrame['author'][$key] }}</td>
                    <td class="p-datatable-bodycell">{{ implode(', ', $dataFrame['tags'][$key]) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>