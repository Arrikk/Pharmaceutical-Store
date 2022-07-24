let link = "/api/companies";
let tb = "Company";
let type = "company"
if (location.pathname == "/approved") {
  tb = "Approved";
  type = 'approved'
  link = "/api/approved";
}

axios.get(link + "?bruiz=start", { headers: bz.headers }).then((res) => {
    if(type == 'company'){
        res.data.data.forEach(tableCompany);
    }else{
        res.data.data.forEach(tableApproved);
    }
  NioApp.DataTable(".datatable-init-ini", {
    responsive: {
      details: true,
    },
    serverSide: true,
    deferLoading: res.data.total,
    ajax: {
      url: link,
      headers: bz.headers,
    },
    destroy: true,
    buttons: ["copy", "excel", "csv", "pdf"],
  });
});

function tableApproved(e, i) {
  $("tbody").append(`
         <tr>
               <td class="lively">${i + 1}</td>
               <td>${e.name}</td>
               <td>${e.code}</td>
               <td>${e.createdAt}</td>
               <td>${e.updatedAt}</td>
          </tr>
      `);
}
function tableCompany(e, i) {
  $("tbody").append(`
         <tr>
               <td class="lively">${i + 1}</td>
               <td>${e.company_name}</td>
               <td>${e.approval_code}</td>
               <td>${e.username}</td>
               <td>${e.createdAt}</td>
               <td>${e.updatedAt}</td>
               <td><a class="btn btn-sm btn-outline-primary" href="/managers/details?user=${
                 e.id
               }">View</a></td>
          </tr>
      `);
}
