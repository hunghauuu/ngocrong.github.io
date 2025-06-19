<script src="/assets/js/vendor.min.js" type="text/javascript"></script>
<script src="/assets/js/app.min.js" type="text/javascript"></script>
<script src="/assets/plugins/moment/min/moment.min.js" type="text/javascript"></script>
<script src="/assets/js/cvhvn.js" type="text/javascript"></script>
<script src="/assets/js/toast.js" type="text/javascript"></script>
<script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" type="text/javascript"></script>
<script>
window.onload = () => {
    const links = document.querySelectorAll('link[rel="stylesheet"]');
    links.forEach(link => {
        const timestamp = new Date().getTime();
        link.href = `${link.href.split('?')[0]}?v=${timestamp}`;
    });
};
</script>

</body>

</html>