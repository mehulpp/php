<?php

/**
 * Interface LessonRepository
 */
interface LessonRepository{
    /**
     * @return array
     */
    public function getAll();
}

/**
 * Class FileRepository
 */
class FileRepository implements LessonRepository{
    /**
     * @return array
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
        return [];
    }

}

/**
 * Class DbRepository
 */
class DbRepository implements LessonRepository{
    /**
     * @return array
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
        return Lesson::findAll()->toArray();
    }

}