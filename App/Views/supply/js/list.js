
axios.get("/api/supplies?bruiz=start", { headers: bz.headers }).then((res) => {
  res.data.forEach(tabledataItem);
  NioApp.DataTable(".datatable-init-ini", {
    responsive: {
      details: true,
    },
    serverSide: true,
    deferLoading: 20,
    ajax: {
      url: "/api/supplies",
      headers: bz.headers,
    },
    destroy: true,
    buttons: ["copy", "excel", "csv", "pdf"],
  });
});

function tabledataItem(e) {
  $("tbody").append(`
       <tr>
             <td class="lively">${e.yj_code}</td>
             <td>${e.product_name}</td>
             <td>${e.shippment_status}</td>
             <td>${e.correspondence_status}</td>
             <td>${e.expected_time}</td>
             <td>${e.material_address}</td>
             <td>${e.createdAt}</td>
             <td>${e.updatedAt}</td>
        </tr>
    `);
}

$(document).on('change', 'select.change_status', function(){
    $(this).removeClass('status_changed').addClass('status_changed')
})

$('#update-selection').on('click', function(){
    let changed = $('table.datatable-init-ini').find('select.status_changed')
    let btn = $(this)
    if(changed.length > 0){
        let data = [];
        changed.each((i, item) => {
            data.push({
                id: $(item).data('id'),
                name: $(item).attr('name'),
                value: $(item).val(),
            })
        })
        btn.html(bz.loading).attr('disabled', 'disabled')
        axios.post('/api/supply/update', {data}, {headers: bz.headers})
        .then(res => {
            btn.html("Update").attr('disabled', false)
            Swal.fire("Update", "Supply information changed", "success");
            console.log(res.data)
        }).catch(err => {
            btn.html("Update").attr('disabled', false)
            Swal.fire("Error", err.response.data.error, "error");
        })
    }
})
