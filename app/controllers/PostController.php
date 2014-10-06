<?php
class PostController extends BaseController {

    // tentukan layout utama yang akan digunakan
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

        if ($v->passes()) {
            $post = new Post;
            $post->title = Input::get('title');
            $post->content = Input::get('content');
            $post->save();

            return Redirect::to('/')
                ->with('message','Post berhasil ditambahkan');
        }

        return Redirect::back()
            ->with('message','Post gagal ditambahkan')
            ->withErrors($v)
            ->withInput();
    }

    public function postUpdate()
    {
        $v = Validator::make(Input::all(),Post::$editRules);

        if ($v->passes()){
            $post = Post::find(Input::get('id'));

            if ($post) {
                $post->title = Input::get('title');
                $post->content = Input::get('content');
                $post->save();

                return Redirect::to('/')
                    ->with('message','Post berhasil di update');
            }

            return Redirect::to('/')
                ->with('message','Post tidak ditemukan');
        }

        return Redirect::to('/')
            ->with('message','Post gagal di update');
    }

    public function postDestroy()
    {
        $post = Post::find(Input::get('id'));

        if ($post) {
            $post->delete();
            return Redirect::to('/')
                ->with('message','Post berhasil dihapus');
        }

        return Redirect::back()
            ->with('message','Post gagal dihapus');
    }
}