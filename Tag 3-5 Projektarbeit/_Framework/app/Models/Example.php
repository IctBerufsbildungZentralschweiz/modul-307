<?php
class Example
{
	public int $id;
	public string $name;

	public function __construct(int $id, string $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	public function getById(int $id): ?self
	{
		$statement = db()->prepare('SELECT * FROM examples WHERE id = :id LIMIT 1');
		$statement->bindParam(':id', $id);
		$statement->execute();

		$result = $statement->fetch();
		if ( ! $result) {
			return null;
		}

		return new self($result['id'], $result['name']);
	}
}