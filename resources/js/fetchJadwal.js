    let urutan = 0;
    $('#name').on('change', () => {
      $.ajax({
        url: '/' + $('#name').data('lembaga') + '/fetchJadwalUser' ,
        type: 'get',
        dataType: 'json',
        data: {
          'userId': $('#name').val(),
        },
        success: function(response) {
          console.log(response);
          if (response) {
            const hasil = document.querySelector("#hasil")
            response.forEach(r => {
              urutan += 1;
              let kelas;
              switch ($('#name').data('lembaga')) {
                case 'SMP':
                  kelas = `<div class="flex flex-col gap-2 mt-2">
                                <label for="kelasUser" class="text-slate-900 dark:text-white">Kelas</label>
                                <input type="text" readonly class="px-3 py-1 rounded-md" value="${r.kelas_smp.name}">
                                <input type="hidden" name="kelas[]" value="${r.kelas_smp.id}">
                              </div>`
                  break;
                 case 'MA':
                  kelas = `<div class="flex flex-col gap-2 mt-2">
                                <label for="kelasUser" class="text-slate-900 dark:text-white">Kelas</label>
                                <input type="text" readonly class="px-3 py-1 rounded-md" value="${r.kelas_ma.name}">
                                <input type="hidden" name="kelas[]" value="${r.kelas_ma.id}">
                              </div>`
                  break;
                 case 'MADIN':
                  kelas = `<div class="flex flex-col gap-2 mt-2">
                                <label for="kelasUser" class="text-slate-900 dark:text-white">Kelas</label>
                                <input type="text" readonly class="px-3 py-1 rounded-md" value="${r.kelas_madin.name}">
                                <input type="hidden" name="kelas[]" value="${r.kelas_madin.id}">
                              </div>`
                  break;
                  break;
                 case 'MMQ':
                  kelas = `<div class="flex flex-col gap-2 mt-2">
                                <label for="kelasUser" class="text-slate-900 dark:text-white">Kelas</label>
                                <input type="text" readonly class="px-3 py-1 rounded-md" value="${r.kelas_mmq.name}">
                                <input type="hidden" name="kelas[]" value="${r.kelas_mmq.id}">
                              </div>`
                  break;
                
                default:
                  break;
              }
            hasil.innerHTML += `
        <div class="mb-2 border-b border-slate-500 pb-3 flex gap-3 container-hasil" data-urutan="${urutan}">
        
        ${kelas}

          <div class="flex flex-col gap-2 mt-2">
            <label for="mapelUser" class="text-slate-900 dark:text-white">Mapel</label>
            <input type="text" readonly class="px-3 py-1 rounded-md" value="${r.pelajaran.name}">
            <input type="hidden" name="mapel[]" value="${r.pelajaran.id}">
          </div>

          <div class="flex flex-col gap-2 mt-2">
            <label for="hari" class="text-slate-900 dark:text-white">Hari</label>
            <input type="text" readonly class="px-3 py-1 rounded-md" value="${r.hari}">
            <input type="hidden" name="hari[]" value="${r.hari}">
          </div>

          <div class="flex flex-col gap-2 mt-2">
            <label for="jam" class="text-slate-900 dark:text-white">Jam</label>
            <input type="integer" readonly class="px-3 py-1 rounded-md" value="${r.jam}">
            <input type="hidden" name="jam[]" value="${r.jam}">
          </div>

          <div class="flex flex-col gap-2 mt-2">
            <label for="jam" class="text-slate-900 dark:text-white">Guru</label>
            <input type="text" readonly class="px-3 py-1 rounded-md" value="${r.user.name}">
            <input type="hidden" name="user_id" value="${r.user.id}">
          </div>

          <div class="flex flex-col gap-2 mt-2">
          <label for="label" class="text-white dark:text-slate-900">Label</label>
          <button type="button"  class="buttonHapus text-red-500" data-urutanTombol="${urutan}">X</button>
          </div>

        </div>
            `});
          }
        }
      });

      $.ajax({
        url: '/' + $('#name').data('lembaga') + '/fetchPelajaranUser/' ,
        dataType: 'json',
        type: 'get',
        data: {
          'userId': $('#name').val(),
          'lembaga': $('#name').data('lembaga')
        },
        success: function(response) {
                  
          if (response) {
            let res = response.map(re => {
              return `<option value="${re.id}">${re.nama}</option>`
            }).join('')
            $('#optionMapelUser').html('')
            $('#optionMapelUser').html(`
            
            <label for="mapelUser" class="text-slate-900 dark:text-white">Mapel</label>
          <select name="mapel" id="mapelUser" required class="px-3 py-1 rounded-md mapel">
            <option value="">Pilih</option>
            ${res}
          </select>
            
            `)
          }
        }
      })
    })
    
    
    const buttonTambah = document.querySelector('#buttonTambah')
    
    buttonTambah.addEventListener('click', () => {
      const kelas = $('#kelasUser option:selected')
      const mapel = $('#mapelUser option:selected')
      const hari = $('#hariUser option:selected')
      const jam = $('#jamUser option:selected')
      const user = $('#name option:selected')

      $.ajax({
        url: '/fetchAdaJadwal/' + buttonTambah.dataset.lembaga,
        type: 'get',
        dataType: 'json',
        data: {
          'kelas': kelas.val(),
          'mapel': mapel.val(),
          'hari': hari.val(),
          'jam': jam.val(),
          'user': user.val(),
          'lembaga': buttonTambah.dataset.lembaga
        },
        success: function(response) {
          urutan += 1;
          if (response == true) {
            return alert('Kelas, Hari, dan Jam tersebut sudah terisi jadwal')
          } else {
            const hasil = document.querySelector("#hasil")
            hasil.innerHTML += `
      <div class="mb-2 border-b border-slate-500 pb-3 flex gap-3 container-hasil" data-urutan="${urutan}">
          <div class="flex flex-col gap-2 mt-2">
            <label for="kelasUser" class="text-slate-900 dark:text-white">Kelas</label>
            <input type="text" readonly class="px-3 py-1 rounded-md" value="${kelas.text()}">
            <input type="hidden" name="kelas[]" value="${kelas.val()}">
          </div>

          <div class="flex flex-col gap-2 mt-2">
            <label for="mapelUser" class="text-slate-900 dark:text-white">Mapel</label>
            <input type="text" readonly class="px-3 py-1 rounded-md" value="${mapel.text()}">
            <input type="hidden" name="mapel[]" value="${mapel.val()}">
          </div>

          <div class="flex flex-col gap-2 mt-2">
            <label for="hari" class="text-slate-900 dark:text-white">Hari</label>
            <input type="text" readonly class="px-3 py-1 rounded-md" value="${hari.text()}">
            <input type="hidden" name="hari[]" value="${hari.val()}">
          </div>

          <div class="flex flex-col gap-2 mt-2">
            <label for="jam" class="text-slate-900 dark:text-white">Jam</label>
            <input type="integer" readonly class="px-3 py-1 rounded-md" value="${jam.text()}">
            <input type="hidden" name="jam[]" value="${jam.val()}">
          </div>

          <div class="flex flex-col gap-2 mt-2">
            <label for="jam" class="text-slate-900 dark:text-white">Guru</label>
            <input type="text" readonly class="px-3 py-1 rounded-md" value="${user.text()}">
            <input type="hidden" name="user_id" value="${user.val()}">
          </div>

          <div class="flex flex-col gap-2 mt-2">
          <label for="label" class="text-white dark:text-slate-900">Label</label>
          <button type="button"  class="buttonHapus text-red-500" data-urutanTombol="${urutan}">X</button>
          </div>

        </div>
      `
          }
        }
      })


    })

    // hapus pilihan 
    $('#hasil').on('click', '.buttonHapus', (e) => {
      let containerHasil = document.querySelectorAll('#hasil .container-hasil')
      containerHasil.forEach(ch => {
        if (ch.dataset.urutan == e.target.dataset.urutantombol) {
          ch.remove()
        }
      });
    })


    
