<?php
class PostController extends BaseController {

    /*
     * Tentukan layout utama yang akan digunakan
     * Berada pada folder 'app/views/layouts/master.blade.php'
     * tanda '/' bisa diganti dengan '.' dan tidak perlu menuliskan .blade.php
     */
    protected $layout = 'layouts.master';

    /**
     * Tampilkan semua posting dari tabel post
     */
    public function getIndex()
    {
        /**
         * Load semua post dari tabel posts
         * class 'Post' berasal dari app/model/Post.php
         */
        $posts = Post::all();
        /* kembalikan tampilan halaman index berikut */
        return View::make('posts.index',['posts'=>$posts]);
    }

    /*
     * Fungsi untuk menampilkan Form Tambah Post
     */
    public function getCreate()
    {
        /* Memasukkan view posts.new ke dalam section content milik default layout */
        $this->layout->content = View::make('posts.new');
    }

    /**
     * Fungsi untuk menambahkan Post baru ke tabel
     */
    public function postCreate()
    {
        /*
         * pertama kita harus memastikan bahwa seluruh data yang dikirim
         * sudah valid, gunakan class Validator untuk hal tersebut
         */
        $v = Validator::make(Input::all(),Post::$rules);

        /* Jika Validator berhasil */
        if ($v->passes()) {
            // Buat objek post baru
            $post = new Post;
            $post->title = Input::get('title'); // ubah atribut title
            $post->content = Input::get('content'); // ubah atribut content
            $post->save(); // simpan objek tersebut ke database
            // Kembalikan ke halaman depan dan tampilkan pesan
            return Redirect::to('/')
                ->with('message','Post berhasil ditambahkan');
        }

        // Validasi gagal, kembali ke halaman sebelumnya
        // Tampilkan pesan error, serta input yang lama
        return Redirect::back()
            ->with('message','Post gagal ditambahkan')
            ->withErrors($v)
            ->withInput();
    }

    /*
     * Fungsi untuk meng-update post
     */
    public function getUpdate($id)
    {
        // Cari POST yang akan diedit berdasarkan id nya
        $post = Post::find($id);
        if ($post) {
            // Jika post ditemukan
            // Tampilkan view posts.edit ke layout utama pada section content
            $this->layout->content = View::make('posts.edit')
                ->with('post',$post);
        } else {
            // Jika post tidak ditemukan
            // Kembalikan ke halaman sebelumnya beserta pesan error
            return Redirect::back()
                ->with('message','Post tidak ditemukan');
        }
    }

    /*
     * Fungsi untuk memproses data dari form update
     */
    public function postUpdate()
    {
        // Validasi datanya, pastikan semua field terisi
        $v = Validator::make(Input::all(),Post::$editRules);
        // Jika validasi berhasil
        if ($v->passes()){
            // Cari Post yang akan diedit dan simpan ke variabel $post
            $post = Post::find(Input::get('id'));

            if ($post) {
                // Jika post ditemukan
                $post->title = Input::get('title'); // update atribut title
                $post->content = Input::get('content'); // update atribut content
                $post->save(); // simpan objek post tersebut
                // Simpan post berhasil, kembalikan ke halaman utama beserta pesan sukses
                return Redirect::to('/')
                    ->with('message','Post berhasil di update');
            }
            // Post tidak ditemukan, kembalikan ke halaman utama dan tampilkan pesan error
            return Redirect::to('/')
                ->with('message','Post tidak ditemukan');
        }
        // Validasi Gagal, kembalikan ke halaman sebelumnya,
        // tampilkan pesan error, error validasi, dan input lama
        return Redirect::back()
            ->with('message','Post gagal diupdate')
            ->withErrors($v)
            ->withInput();
    }

    /**
     * Delete Post
     */
    public function postDestroy()
    {
        // Cari post yang akan di delete dan simpan ke variabel $post
        $post = Post::find(Input::get('id'));

        if ($post) {
            // JIka post ditemukan, delete post tersebut
            $post->delete();
            // kembalikan ke halaman utama beserta pesan sukses
            return Redirect::to('/')
                ->with('message','Post berhasil dihapus');
        }
        // Post tidak ditemukan, kembalikan ke halaman utama beserta pesan error
        return Redirect::back()
            ->with('message','Post gagal dihapus');
    }
}