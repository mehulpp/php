<?php

/**
* The principle defines that objects of a superclass shall be replaceable with objects of its subclasses without breaking the application. 
*/
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
