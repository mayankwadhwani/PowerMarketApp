<script>
    let vendors = JSON.parse(`{!! json_encode($vendors) !!}`);
    @if(isset($organization_vendor))
        let vendorOrganisation = JSON.parse(`{!! json_encode($organization_vendor->auth_data) !!}`);
    @else
        let vendorOrganisation = {};
    @endif

    $(document).ready(function() {

        $("#vendor_id").on('change', function() {
            let fields = '';
            let selectedVendorId = parseInt(this.value);
            let selectedVendor = vendors.find(x => x.id === selectedVendorId);

            for (let i = 0; i < selectedVendor.auth_data.length; ++i) {
                fields += '<div class="form-group">'+
                    '<label class="form-control-label" for="input-system_cost">' + selectedVendor.auth_data[i].label + '</label>'+
                    '<input type="text" required name="' + selectedVendor.auth_data[i].name + '" id="input-system_cost" class="form-control" placeholder="Fill in the ' + selectedVendor.auth_data[i].label + '" value="' + ((vendorOrganisation[selectedVendor.auth_data[i].name]) ? vendorOrganisation[selectedVendor.auth_data[i].name] : '') + '">'+
                    '</div>'

            }

            $("#auth_data_container").html(fields);
        });

        $('#vendor_id').trigger('change');
    });
</script>
