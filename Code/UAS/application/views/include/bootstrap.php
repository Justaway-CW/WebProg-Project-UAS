<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<style>
    .btn-shadow {
        box-shadow: 2px 3px 8px grey;
        transition: 0.2s;
    }
    .btn-shadow:hover {
        box-shadow: 4px 8px 12px grey;
    }
    .form-control, .form-select{
        border-color: transparent rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.2) transparent;
        box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.2);
        color: #505050;
    }
    .btn-form{
        border-color: transparent rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.2) transparent;
        box-shadow: 2px 5px 5px rgba(0, 0, 0, 0.2);
        transition: 0.2s;
    }
    .btn-form:hover{
        border-color: transparent rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.2) transparent;
        box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.2);
    }
    .btn-card{
        border-color: transparent rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.2) transparent;
        box-shadow: 3px 6px 6px rgba(0, 0, 0, 0.2);
        transition: 0.2s;
    }
    .btn-card:hover{
        border-color: transparent rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.2) transparent;
        box-shadow: 2px 3px 3px rgba(0, 0, 0, 0.2);
        transform: scale(0.98);
    }
    .footerPage{
        color: white;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.753);
        box-shadow: 0 8px 20px 4px black;
    }

    .news-header{
        padding: 5%;
        background-image: linear-gradient(to top, rgba(138, 138, 138, 0), rgba(138,138,138,1));
        width: 100%;
        height: 100px;
    }

    .table-text{
        font-size: 7px;
    }

    @media only screen and (min-width: 800px) {
        .table-text{
            font-size: 15px;
        }
    }
</style>
<script>
    $(document).ready(function(){
        $("#dropdownBtn").click(function(){
            $("#options").slideToggle();
        })
    })
    $(document).ready(function(){
        $("#dropdownBtn2").click(function(){
            $("#options2").slideToggle();
        })
    })
</script>