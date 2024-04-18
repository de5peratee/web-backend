<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\FormValidation;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogEditController
{
    public function indexEditor()
    {
        return view('/admin/blog-editor');
    }

    public function indexUpload()
    {
        return view('/admin/upload-blog');
    }

    public function uploadSubmit(Request $request)
    {
        if (!$request->hasFile('file')) {
            return back()->withErrors(['file' => 'Пожалуйста, выберите файл для загрузки.']);
        }

        $file = $request->file('file');
        if ($file->getClientOriginalExtension() != 'csv') {
            return back()->withErrors(['file' => 'Неверный формат файла. Пожалуйста, загрузите CSV-файл.']);
        }

        $path = $file->store('public');
        $csvData = urldecode(file_get_contents(storage_path('app/' . $path)));
        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);

        $validator = new FormValidation();

        foreach ($rows as $row) {
            if (count($row) == count($header)) {
                $row = array_combine($header, $row);

                $validator->setRule('title', 'isNotEmpty');
                $validator->setRule('body', 'isNotEmpty');
                $validator->setRule('author', 'isNotEmpty');
                $validator->setRule('created_at', 'isNotEmpty');
                $validator->validate($row);

                if (empty($validator->getErrors())) {

                    BlogPost::create([
                        'title' => $row['title'],
                        'body' => $row['body'],
                        'author' => $row['author'],
                        'image' => $row['image'] ?? null,
                        'created_at' => $row['created_at'],
                        'updated_at' => $row['created_at']
                    ]);
                }
            }
        }

        return back()->with('success', 'Записи блога успешно загружены.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
        ]);

        $blogPost = new BlogPost;
        $blogPost->title = $request->title;
        $blogPost->author = $request->author;
        $blogPost->body = $request->body;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/postImages');
            $blogPost->image = $path;
        }

        $blogPost->save();

        return redirect('/blog-editor');
    }
}
